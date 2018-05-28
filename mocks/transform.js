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
        start = new Date(1970, sp[0], sp[1])
        const ep = parseDateString(pieces[1])
        end = new Date(2999, ep[0], ep[1])
    }

    return {
        start,
        end,
    }
}

const campgrounds = seed.campground_finder_updated.map(campground => ({
    id: parseAsInt(campground.id),
    name: campground.camp_name.trim(),

    // conform to GeoJSON http://geojson.org/
    geo: {
        type: 'FeatureCollection',
        features: [
            {
                type: 'Feature',
                properties: {},
                geometry: {
                    type: 'Point',
                    coordinates: [0,0],
                }
            },
        ],
    },

    elevation: parseAsInt(campground.elevation),
    nearestLandmark: campground.location,
    dateRange: parseDateRange(campground.camp_open),
    water: {
        available: (campground.water.trim().toLowerCase() !== 'no water'),
        dateRange: parseDateRange(campground.water),
        type: null,
    },

    maxLength: parseAsInt(campground.length),
    fees: parseAsInt(campground.fees),
    numSites: parseAsInt(campground.num_sites),

    features: {
        bearBoxes: parseAsBool(campground.bear_boxes),
        boatRamps: parseAsBool(campground.ramps),
        camphost: parseAsBool(campground.camphost),
        dumps: parseAsBool(campground.dump),
        groups: parseAsBool(campground.groups),
        hookups: parseAsBool(campground.hookups),
        reservations: parseAsBool(campground.reservations),
        restrooms: campground.toilets
            .split('/')
            .map(s => s.trim().toLowerCase()),
        showers: parseAsBool(campground.showers),
        tents: parseAsBool(campground.tents),
        wheelchairs: parseAsBool(campground.wheelchair),
    },

    recreation: {
        hiking: parseAsBool(campground.hiking),
        shoreline: parseAsBool(campground.shoreline),
        swimming: parseAsBool(campground.swimming),
    },
}))

fs.writeFileSync('./transformed.json', JSON.stringify(campgrounds, null, '  '))
