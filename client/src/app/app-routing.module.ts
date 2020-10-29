import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { LoginSuccessComponent } from '@nuvem/angular-base';

import { TesteComponent } from './teste/teste.component';
import { FuncionariosComponent } from './pages/funcionarios/funcionarios.component';
import { DiarioErrosComponent } from './components/diario-erros/diario-erros.component';
import { FuncionarioFormComponent } from './pages/funcionario-form/funcionario-form.component';

const routes: Routes = [
    { path: '', component: TesteComponent },
    { path: 'funcionarios', component: FuncionariosComponent },
    { path: 'funcionario/novo', component: FuncionarioFormComponent },
    { path: 'funcionario/:id', component: FuncionarioFormComponent },
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
