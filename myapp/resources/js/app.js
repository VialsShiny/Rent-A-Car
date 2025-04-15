import './bootstrap';
import 'remixicon/fonts/remixicon.css'
import { filter, vehicules } from './filter';

vehicules();

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();