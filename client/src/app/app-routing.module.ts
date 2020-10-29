import {FuncionariosComponent} from './pages/funcionarios/funcionarios.component';
import {AutomovelFormComponent} from './pages/automovel-form/automovel-form.component';
import {AutomovelComponent} from './pages/automovel/automovel.component';
import {NgModule} from '@angular/core';
import {RouterModule, Routes} from '@angular/router';

import {DiarioErrosComponent} from './components/diario-erros/diario-erros.component';
import {LoginSuccessComponent} from '@nuvem/angular-base';
import {FuncionarioFormComponent} from './pages/funcionario-form/funcionario-form.component';

const routes: Routes = [
    { path: 'funcionarios', component: FuncionariosComponent },
    { path: 'funcionarios/novo', component: FuncionarioFormComponent },
    { path: 'funcionarios/:id', component: FuncionarioFormComponent },
    { path: 'automoveis', component: AutomovelComponent },
    { path: 'automoveis/novo', component: AutomovelFormComponent },
    { path: 'automoveis/:id', component: AutomovelFormComponent },
    { path: 'diario-erros', component: DiarioErrosComponent, data: { breadcrumb: 'Diário de Erros'} },
    { path: 'login-success', component: LoginSuccessComponent },
];

@NgModule({
  imports: [
    RouterModule.forRoot(routes)
  ],
  exports: [RouterModule]
})
export class AppRoutingModule { }
