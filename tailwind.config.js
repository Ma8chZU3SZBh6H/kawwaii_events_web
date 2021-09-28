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
                bgTrans: "#6D6D6D",
            },
            gridTemplateColumns: {
                navExpanded: "auto 1fr",
                test: "200px minmax(900px, 1fr) 100px",
            },
        },
    },
    variants: {
        extend: {
            blur: ["hover", "focus"],
            zIndex: ["hover", "active"],
            fontWeight: ["hover", "focus"],
        },
    },
    plugins: [],
};
