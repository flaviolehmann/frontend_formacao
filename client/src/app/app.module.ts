import {NgModule} from '@angular/core';
import {AppRoutingModule} from './app-routing.module';
import {AppComponent} from './app.component';
import {SharedModule} from './shared/shared.module';
import {AppTopbarComponent} from './components/topbar/app.topbar.component';
import {AppFooterComponent} from './components/footer/app.footer.component';
import {HashLocationStrategy, LocationStrategy} from '@angular/common';
import {environment} from '../environments/environment';
import {HttpClientModule} from '@angular/common/http';
import {BreadcrumbModule, ErrorStackModule, MenuModule, PageNotificationModule} from '@nuvem/primeng-components';
import {PipeModule, SecurityModule, VersionTagModule} from '@nuvem/angular-base';

import {BlockUIModule} from 'ng-block-ui';

import {CoreModule} from './core/core.module';
import {ConfirmationService, MessageService} from 'primeng/api';

import {DiarioErrosComponent} from './components/diario-erros/diario-erros.component';
import {PaginaInicialComponent} from './view/pagina-inicial/pagina-inicial.component';
import {AutomovelComponent} from './pages/automovel/automovel.component';
import {AutomovelFormComponent} from './pages/automovel-form/automovel-form.component';
import {FuncionariosComponent} from './pages/funcionarios/funcionarios.component';
import {FuncionarioFormComponent} from './pages/funcionario-form/funcionario-form.component';

@NgModule({
    declarations: [
        AppComponent,
        AppTopbarComponent,
        AppFooterComponent,
        DiarioErrosComponent,
        PaginaInicialComponent,
        FuncionarioFormComponent,
        FuncionariosComponent,
        AutomovelComponent,
        AutomovelFormComponent
    ],
    imports: [
        BlockUIModule.forRoot({
            message: "Carregando..."
        }),
        AppRoutingModule,
        SharedModule,
        HttpClientModule,
        PageNotificationModule,
        BreadcrumbModule,
        ErrorStackModule,
        VersionTagModule,
        SecurityModule.forRoot(environment.auth),
        MenuModule,
        CoreModule,
        PipeModule
    ],
    providers: [
        ConfirmationService,
        MessageService,
        { provide: LocationStrategy, useClass: HashLocationStrategy }
    ],
    bootstrap: [AppComponent]
})
export class AppModule { }
