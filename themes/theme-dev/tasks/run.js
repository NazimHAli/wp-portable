export const run = {
  default: {
    js: {
      uglify: false,
    },
    css: {
      cssnano: false,
    },
  },
  development: {
    js: {
      uglify: false,
    },
    css: {
      cssnano: false,
    },
  },
  production: {
    js: {
      uglify: true,
    },
    css: {
      cssnano: true,
    },
  },
};
