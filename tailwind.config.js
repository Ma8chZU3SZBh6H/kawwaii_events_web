module.exports = {
    purge: [
        "./resources/**/*.blade.php",

        "./resources/**/*.js",

        "./resources/**/*.vue",
    ],
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {
            colors: {
                title: "#646464",
                text: "#878787",
                lightTitle: "#F0F0F0",
                lightText: "#E6E6E6",
                bg: "#FCFCFC",
            },
        },
    },
    variants: {
        extend: {},
    },
    plugins: [],
};
