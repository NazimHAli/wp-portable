/* eslint-disable no-unused-vars */
import { paths } from "./paths";
import { plugins } from "./plugins";
import { run } from "./run";

const runOpts = { ...run.default, ...run.production };
const pluginOpts = { ...plugins.default, ...plugins.production };

const argv = process.argv;
const isProd = argv.includes("--env=production") || process.env.NODE_ENV === "production";
const env = isProd ? "production" : "development";

export { paths, runOpts, pluginOpts, env };
