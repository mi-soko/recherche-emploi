/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)

import 'select2/dist/css/select2.min.css'
import 'select2/dist/js/select2.min'

const $ = require('jquery');
global.$ = global.jQuery = $;

import './styles/app.css';
import 'bootstrap/dist/js/bootstrap.bundle.min'
import 'bootstrap/dist/css/bootstrap.min.css'
import './js/btn-selected'
import './js/api'
import  '@fortawesome/fontawesome-free/js/all.min';
import  '@fortawesome/fontawesome-free/css/all.min.css';


// start the Stimulus application
import './bootstrap';

