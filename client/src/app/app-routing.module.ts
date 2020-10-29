<<<<<<< HEAD
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
=======
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
>>>>>>> 5109312fee3fc76cbb1b963b7ab3fefcd66d882d
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
