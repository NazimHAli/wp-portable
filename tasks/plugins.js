/* eslint-disable no-unused-vars */

export const plugins = {
  default: {
    js: {
      uglify: {
        mangle: true,
      },
    },
  },
  development: {
    js: {
      uglify: {
        mangle: false,
      },
    },
  },
  production: {
    js: {
      uglify: {
        mangle: true,
      },
    },
  },
};
