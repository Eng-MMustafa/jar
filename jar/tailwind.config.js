export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['"IBM Plex Sans Arabic"', 'ui-sans-serif', 'system-ui', 'sans-serif'],
            },
            colors: {
                primary: {
                    DEFAULT: '#0d9488',
                    hover: '#0f766e',
                    active: '#115e59',
                    dark: '#134e4a',
                },
                secondary: {
                    DEFAULT: '#00ce67',
                    hover: '#00b95d',
                    active: '#00a552',
                },
                neutral: {
                    50: '#FFFFFF',
                    100: '#f5f5f5',
                    200: '#e5e5e5',
                    300: '#d4d4d4',
                    400: '#a3a3a3',
                    500: '#737373',
                    600: '#525252',
                    700: '#404040',
                    800: '#262626',
                    900: '#171717',
                    950: '#0A0A0A',
                },
                status: {
                    success: '#2fd36f',
                    warning: '#ed8a0a',
                    error: '#f54141',
                }
            }
        }
    },
    plugins: [],
};
