import {format} from "date-fns";
import {formatInTimeZone} from "date-fns-tz";

export const ClockComponent = (config) => {
    return {
        timezones: [],
        init() {
            const now = new Date();
            this.calculate();
            setInterval(() => this.calculate(), 5000);
        },

        calculate() {
            const now = new Date();

            this.timezones = Object.entries(config.timezones).map(([tz, label]) => {
                return {
                    label,
                    value: formatInTimeZone(now, tz, 'h:mm aa'),
                }
            });
        }
    }
}
