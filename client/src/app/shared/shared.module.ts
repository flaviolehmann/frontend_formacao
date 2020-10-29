import { RouterModule } from '@angular/router';
import { CommonModule } from '@angular/common';
import { NgModule } from '@angular/core';
<<<<<<< HEAD
import { ReactiveFormsModule } from '@angular/forms';
=======
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
>>>>>>> 5109312fee3fc76cbb1b963b7ab3fefcd66d882d

import { CurrencyMaskModule } from "ng2-currency-mask";
import {ConfirmationService, MessageService} from 'primeng/api';

import { PRIMENG_IMPORTS } from './primeng-imports';
import { FormFieldErrorComponent } from './components/form-field-error/form-field-error.component';

@NgModule({
    imports: [
        PRIMENG_IMPORTS,
        CommonModule,
        ReactiveFormsModule,
<<<<<<< HEAD
=======
        FormsModule,
>>>>>>> 5109312fee3fc76cbb1b963b7ab3fefcd66d882d
        RouterModule,
        CurrencyMaskModule
    ],
    providers: [
        ConfirmationService,
        MessageService
    ],
    exports: [
        PRIMENG_IMPORTS,
        CommonModule,
        ReactiveFormsModule,
<<<<<<< HEAD
=======
        FormsModule,
>>>>>>> 5109312fee3fc76cbb1b963b7ab3fefcd66d882d
        RouterModule,
        CurrencyMaskModule,

        // Componentes compartilhados
        FormFieldErrorComponent
    ],
    declarations: [FormFieldErrorComponent]
})
export class SharedModule { }
