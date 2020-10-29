import { AutomovelFormComponent } from './pages/automovel-form/automovel-form.component';
import { AutomovelComponent } from './pages/automovel/automovel.component';
import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { DiarioErrosComponent } from './components/diario-erros/diario-erros.component';
import { LoginSuccessComponent } from '@nuvem/angular-base';

import { TesteComponent } from './teste/teste.component';
import { FuncionarioComponent } from './pages/funcionario/funcionario.component';
import { FuncionarioFormComponent } from './pages/funcionario-form/funcionario-form.component';

const routes: Routes = [
    { path: '', component: TesteComponent},
    { path: 'funcionarios', component: FuncionarioComponent },
    { path: 'funcionarios/novo', component: FuncionarioFormComponent },
    { path: 'automoveis', component: AutomovelComponent },
    { path: 'automoveis/novo', component: AutomovelFormComponent },
    { path: 'automoveis/:id', component: AutomovelFormComponent },
    { path: 'funcionarios/:id', component: FuncionarioFormComponent },
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