import {Component, ElementRef, EventEmitter, OnInit, Output} from '@angular/core';

declare const $;

@Component({
    selector: 'modal',
    templateUrl: './modal.component.html',
    styleUrls: ['./modal.component.css']
})
export class ModalComponent implements OnInit {

    @Output()
    onHide: EventEmitter<Event> = new EventEmitter<Event>();

    constructor(private element: ElementRef) {

    }

    ngOnInit() {
        const JQueryElement = this.getJQueryElement();

        JQueryElement.find('[modal-title]').addClass('modal-title');
        JQueryElement.find('[modal-body]').addClass('modal-body');
        JQueryElement.find('[modal-footer]').addClass('modal-footer');

        JQueryElement.on('hidden.bs.modal', (e) => {
            this.onHide.emit(e);
        });
    }

    show() {
        this.getJQueryElement().modal('show');
    }

    hide() {
        this.getJQueryElement().modal('hide');
    }

    private getJQueryElement() {
        const nativeElement = this.element.nativeElement;
        return $(nativeElement.firstChild);
    }
}
