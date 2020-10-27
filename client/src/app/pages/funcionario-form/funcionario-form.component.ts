import { Funcionario } from "./../../models/funcionario.model";
import { Component, OnInit } from "@angular/core";
import { FormBuilder, Validators, FormGroup } from "@angular/forms";
import { ActivatedRoute, Router } from "@angular/router";
import { FuncionarioService } from "src/app/services/funcionario.service";
import { MessageService, SelectItem } from "primeng";
import { FilialService } from "src/app/services/filial.service";
import { CargoService } from "src/app/services/cargo.service";

@Component({
  selector: "app-funcionario-form",
  templateUrl: "./funcionario-form.component.html",
  styleUrls: ["./funcionario-form.component.css"],
})
export class FuncionarioFormComponent implements OnInit {
  funcionarioId: string;
  formulario: FormGroup;
  funcionario: Funcionario;
  cargos: SelectItem[];
  filiais: SelectItem[];
  sexos: SelectItem[] = [
    { label: 'Selecione um sexo', value: null },
    { label: 'Masculino', value: 'M' },
    { label: 'Feminino', value: 'F' }
  ];

  constructor(
    private activeRoute: ActivatedRoute,
    private route: Router,
    private funcionarioService: FuncionarioService,
    private formBuilder: FormBuilder,
    private toastService: MessageService,
    private filialService: FilialService,
    private cargoService: CargoService
  ) { }

  ngOnInit(): void {
    this.iniciarForm();
    this.funcionarioId = this.activeRoute.snapshot.paramMap.get('id');

    // verifica para caso estiver alterando, carregar o funcionario
    if(this.funcionarioId) {
      this.carregarFuncionario(this.funcionarioId);
    };

    // carrega as filiais no dropdown mapeando para cada item do array para um novo objeto do tipo SelectItem
    this.filialService.listar().subscribe((filiais) => {
      this.filiais = filiais.map((filial) => {
        return { label: filial.nome, value: filial.id};
      });
    });

    // carrega os cargos no dropdown mapeando para cada item do array para um novo objeto do tipo SelectItem
    this.cargoService.listar().subscribe((cargos) => {
      this.cargos = cargos.map((cargo) => {
        return { label: cargo.descricao, value: cargo.id };
      })
    });
  }

  salvar() {
    if(this.funcionarioId) {
      this.funcionarioService.save(this.formulario.value).subscribe(
        (funcionario) => {
          this.route.navigate(['funcionarios']);
          this.toastService.add({severity: 'success', summary: 'Sucesso', detail: 'Funcionário atualizado com sucesso!'});
        },
        () => {
          this.toastService.add({severity: 'error', summary: 'Falha', detail: 'Falha ao atualizar funcionario.'});
        }
      );
    } else {
      this.funcionarioService.save(this.formulario.value).subscribe(
        (funcionario) => {
          this.route.navigate(['funcionarios']);
          this.toastService.add({severity: 'success', summary: 'Sucesso', detail: 'Funcionário cadastrado com sucesso!'});
        },
        () => {
          this.toastService.add({severity: 'error', summary: 'Falha', detail: 'Falha ao cadastrar funcionario.'});
        }
      );
    }
  }

  private carregarFuncionario(id: number | string) {
    this.funcionarioService.obterPorId(id).subscribe(
      (funcionario) => {
        this.formulario.patchValue(funcionario);
      }
    )
  }

  private iniciarForm() {
    this.formulario = this.formBuilder.group({
      id: [null],
      nome: [null, [Validators.required, Validators.minLength(3)]],
      data_aniversario: [null, [Validators.required]],
      sexo: [null, [Validators.required, Validators.maxLength(1), Validators.minLength(1)]],
      cpf: [null, [Validators.required, Validators.maxLength(11), Validators.minLength(11)]],
      numero: [null, [Validators.required, Validators.maxLength(6)]],
      rua: [null, [Validators.required]],
      bairro: [null, [Validators.required]],
      complemento: [null],
      cidade: [null, [Validators.required]],
      uf: [null, [Validators.required, Validators.maxLength(2), Validators.minLength(2)]],
      cep: [null, [Validators.required]],
      salario: [null, [Validators.required]],
      status: [1, [Validators.required]],
      cargo_id: [null, [Validators.required]],
      filial_id: [null, [Validators.required]],
    });
  }
}
