import { Component, OnInit } from '@angular/core';
import {FormBuilder, FormControl, FormGroup, Validators} from "@angular/forms";
import {ActivatedRoute} from "@angular/router";
import {FuncionarioService} from "../../services/funcionario.service";
import {MessageService} from "primeng";
import {switchMap} from "rxjs/operators";
import {CargoService} from "../../services/cargo.service";

@Component({
  selector: 'app-cargo-fom',
  templateUrl: './cargo-fom.component.html',
  styleUrls: ['./cargo-fom.component.css']
})
export class  CargoFomComponent implements OnInit {

  formulario: FormGroup;

  constructor(
      private activeRoute: ActivatedRoute,
      private cargoService: CargoService,
      private formBuilder: FormBuilder,
      private messageService: MessageService
  ) { }

  ngOnInit(): void {
    this.iniciarForm();
    this.atualizarParaEdicao();
  }

  atualizarParaEdicao() {
    this.activeRoute.paramMap
        .pipe(
            switchMap(params => this.cargoService.obterPorId(+params.get("id")))
        ).subscribe(res => {
          res.id && this.formulario.patchValue({ ...res, data_aniversario: new Date(res.data_aniversario) });
        }
    );
  }

  salvar() {
    if (this.formulario.valid) {
      this.cargoService.save(this.formulario.value).subscribe(
          () => this.messageService.add({ severity: "success", summary: "Sucesso!", detail: "Cargo cadastrado." }),
          () => {
            this.messageService.add({ severity: "error", summary: "Error!", detail: "Verifique o formulário e tente novamente." });
          }
      )
      return;
    }
    this.messageService.add({ severity: "error", summary: "Error!", detail: "Formulário Inválido." });
  }

  iniciarForm() {
    this.formulario = this.formBuilder.group({
      id: new FormControl({value: null, disabled: true}, Validators.required),
      descricao: ['', [Validators.required, Validators.minLength(3)]]
    });
  }

}
