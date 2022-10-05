import { Controller } from '@hotwired/stimulus';
import datepicker from 'js-datepicker'

/*
 * This is an example Stimulus controller!
 *
 * Any element with a data-controller="hello" attribute will cause
 * this controller to be executed. The name "hello" comes from the filename:
 * hello_controller.js -> "hello"
 *
 * Delete this file or adapt it for your use!
 */
export default class extends Controller {
    static targets = ["input"]

    datepicker;

    connect() {
        this.datepicker = datepicker(this.inputTarget, {
            customDays: ['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'],
            customMonths: ['Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
            formatter: (input, date) => {
                input.value = date.toLocaleDateString('fr-FR')
            },
        });
    }
    disconnect() {
        if (this.datepicker) {
            this.datepicker.remove();
            this.datepicker = null;
        }
    }
}
