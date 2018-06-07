const fs = require('fs')
const seed = require('./seed.json')

const parseAsInt = s => {
	const parsed = parseInt(s, 10)
	return isNaN(parsed) ? null : parsed
}

const parseAsBool = s => {
	return !!(parseAsInt(s))
}

const parseDateString = s => {
	if (s.indexOf('/') >= 0) {
		return s.split('/').map((p, idx) => {
			const d = +p
			return (idx === 0) ? d - 1: d
		})
	}

	const d = new Date(`${s}, ${new Date().getFullYear()}`)
	return [
		d.getUTCMonth(),
		d.getUTCDate(),
	]

}

const parseDateRange = s => {
	let str = s.trim()
	let start = null
	let end = null

	if (str.indexOf('-') >= 0) {
		const pieces = str.split('-')
		const sp = parseDateString(pieces[0])
		start = new Date(0001, sp[0], sp[1])
		const ep = parseDateString(pieces[1])
		end = new Date(9999, ep[0], ep[1])
	}

	return {
		from: start && start.toISOString(),
		to: end && end.toISOString(),
	}
}

const campgrounds = seed.campground_finder_updated.map(campground => ({
	// id: parseAsInt(campground.id),
	title: campground.camp_name.trim(),
	meta: {
		elevation: parseAsInt(campground.elevation),
		nearTo: campground.location.trim(),

		// conform to GeoJSON http://geojson.org/
		geo: {
			type: 'FeatureCollection',
			features: [
				{
					type: 'Feature',
					properties: {},
					geometry: {
						type: 'Point',
						coordinates: [
							-122.80448913574219,
							40.7202010588415,
							(parseAsInt(campground.elevation) === null)
							? null
							: null //parseAsInt(campground.elevation) * 0.3048 // convert to meters
						],
					}
				},
			],
		},

		open: parseDateRange(campground.camp_open),
		water: {
			available: (campground.water.trim().toLowerCase() !== 'no water'),
			...parseDateRange(campground.water),
		},

		maxLength: parseAsInt(campground.length),
		fees: parseAsInt(campground.fees),
		numSites: parseAsInt(campground.num_sites),
	},

	terms: {
		activity: {
			hiking: parseAsBool(campground.hiking),
			shoreline: parseAsBool(campground.shoreline),
			swimming: parseAsBool(campground.swimming),
		},

		feature: {
			bearBoxes: parseAsBool(campground.bear_boxes),
			boatRamps: parseAsBool(campground.ramps),
			campHost: parseAsBool(campground.camphost),
			dumpStation: parseAsBool(campground.dump),
			groups: parseAsBool(campground.groups),
			hookups: parseAsBool(campground.hookups),
			reservable: parseAsBool(campground.reservations),
			restrooms: campground.toilets
			.split('/')
			.map(s => s.trim().toLowerCase()),
			showers: parseAsBool(campground.showers),
			tents: parseAsBool(campground.tents),
			wheelchairAccess: parseAsBool(campground.wheelchair),
		},

		toilet: {},
	}
}))

const json = {
	settings: {
		nearTo: campgrounds.reduce((acc, val) => {
			if (acc.indexOf(val.nearTo) === -1) acc.push(val.nearTo)
			return acc
		}, []).sort()
	},
	campgrounds,
}

fs.writeFileSync('./transformed.json', JSON.stringify(json, null, '  '))
