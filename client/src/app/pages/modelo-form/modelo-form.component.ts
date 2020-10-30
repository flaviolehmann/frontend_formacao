import {Component, OnInit} from '@angular/core';
import {FormBuilder, FormControl, FormGroup, Validators} from "@angular/forms";
import {ActivatedRoute} from "@angular/router";
import {MessageService} from "primeng";
import {switchMap} from "rxjs/operators";
import {ModeloService} from "../../services/modelo.service";

@Component({
  selector: 'app-modelo-form',
  templateUrl: './modelo-form.component.html',
  styleUrls: ['./modelo-form.component.css']
})
export class ModeloFormComponent implements OnInit {

  formulario: FormGroup;

  constructor(
      private activeRoute: ActivatedRoute,
      private modeloService: ModeloService,
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
            switchMap(params => this.modeloService.show(+params.get("id")))
        ).subscribe(res => {
          res.id && this.formulario.patchValue(res);
        }
    );
  }

  salvar() {
    if (this.formulario.valid) {
      this.modeloService.create(this.formulario.value).subscribe(
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