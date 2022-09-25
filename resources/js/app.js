import Alpine from 'alpinejs';
import * as ToastComponent from '../../vendor/usernotnull/tall-toasts/dist/js/tall-toasts';
import {ClockComponent} from "./components/clock";

Alpine.data('ToastComponent', ToastComponent);
Alpine.data('ClockComponent', ClockComponent);

window.Alpine = Alpine;
Alpine.start();
