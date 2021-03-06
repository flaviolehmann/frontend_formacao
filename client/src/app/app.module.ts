import { NgModule } from '@angular/core';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { SharedModule } from './shared/shared.module';
import { AppTopbarComponent } from './components/topbar/app.topbar.component';
import { AppFooterComponent } from './components/footer/app.footer.component';
import { LocationStrategy, HashLocationStrategy } from '@angular/common';
import { environment } from '../environments/environment';
import { HttpClientModule } from '@angular/common/http';
import { PageNotificationModule, BreadcrumbModule, MenuModule, ErrorStackModule } from '@nuvem/primeng-components';
import { SecurityModule, VersionTagModule } from '@nuvem/angular-base';

import { BlockUIModule } from 'ng-block-ui';

import { CoreModule } from './core/core.module';
import { ConfirmationService, MessageService } from 'primeng/api';

import { DiarioErrosComponent } from './components/diario-erros/diario-erros.component';
import { PaginaInicialComponent } from './view/pagina-inicial/pagina-inicial.component';
import { TesteComponent } from './teste/teste.component';
import { Teste2Component } from './teste2/teste2.component';
import { FuncionariosComponent } from './pages/funcionarios/funcionarios.component';
import { FuncionarioFormComponent } from './pages/funcionario-form/funcionario-form.component';

@NgModule({
    declarations: [
        AppComponent,
        AppTopbarComponent,
        AppFooterComponent,
        DiarioErrosComponent,
        PaginaInicialComponent,
        TesteComponent,
        Teste2Component,
        FuncionariosComponent,
        FuncionarioFormComponent,
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
        CoreModule
    ],
    providers: [
        ConfirmationService,
        MessageService,
        { provide: LocationStrategy, useClass: HashLocationStrategy }
    ],
    bootstrap: [AppComponent]
})
export class AppModule { }
