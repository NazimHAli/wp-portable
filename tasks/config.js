/* eslint-disable no-unused-vars */
import { paths } from "./paths";
import { plugins } from "./plugins";
import { run } from "./run";

const runOpts = { ...run.default, ...run.production };
const pluginOpts = { ...plugins.default, ...plugins.production };

export { paths, runOpts, pluginOpts };
