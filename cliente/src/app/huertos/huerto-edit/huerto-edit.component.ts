import {
  Component,
  OnInit,
  AfterViewInit,
  OnDestroy,
  ViewChildren,
  ElementRef,
} from '@angular/core';
import {
  FormBuilder,
  FormGroup,
  FormControl,
  FormArray,
  Validators,
  FormControlName,
} from '@angular/forms';
import { ActivatedRoute, Router } from '@angular/router';

import { Huerto } from '../../shared/huerto';
import { HuertoService } from '../../core/huerto.service';

@Component({
  templateUrl: './huerto-edit.component.html',
})
export class HuertoEditComponent implements OnInit {
  pageTitle = 'Editar el huerto';
  errorMessage: string = '';
  huertoForm: any;

  huertoId: number = 0;
  huerto: Huerto = {
    id: 0,
    name: '',
    image: '',
    productos: [],
    size: 0,
    disponibilidad: '',
    idUsuario: '',
  };

  constructor(
    private fb: FormBuilder,
    private activatedroute: ActivatedRoute,
    private router: Router,
    private huertoService: HuertoService
  ) {}

  ngOnInit(): void {
    this.huertoForm = this.fb.group({
      id: 0,
      name: '',
      image: '',
      productos: [],
      size: 0,
      disponibilidad: '',
      idUsuario: '',
    });

    // Read the huerto Id from the route parameter
    this.huertoId = parseInt(this.activatedroute.snapshot.params['id']);
    this.getHuerto(this.huertoId);
  }

  getHuerto(id: number): void {
    this.huertoService.getHuertoById(id).subscribe(
      (huerto: Huerto) => this.displayHuerto(huerto[0]),
      (error: any) => (this.errorMessage = <any>error)
    );
  }

  displayHuerto(huertos: Huerto): void {
    if (this.huertoForm) {
      this.huertoForm.reset();
    }
    this.huerto = huertos[0];
    this.pageTitle = `Edit Huerto: ${this.huerto.name}`;

    // Update the data on the form
    this.huertoForm.patchValue({
      name: this.huerto.name,
      image: this.huerto.image,
      productos: this.huerto.productos,
      size: this.huerto.size,
      disponibilidad: this.huerto.disponibilidad,
      idUsuario: this.huerto.idUsuario,
    });
  }

  deleteHuerto(): void {
    if (this.huerto.id === 0) {
      // Don't delete, it was never saved.
      this.onSaveComplete();
    } else {
      if (confirm(`Really delete the huerto: ${this.huerto.name}?`)) {
        this.huertoService.deleteHuerto(this.huerto.id).subscribe(
          () => this.onSaveComplete(),
          (error: any) => (this.errorMessage = <any>error)
        );
      }
    }
  }

  saveHuerto(): void {
    if (this.huertoForm.valid) {
      if (this.huertoForm.dirty) {
        this.huerto = this.huertoForm.value;
        this.huerto.id = this.huertoId;

        this.huertoService.updateHuerto(this.huerto).subscribe(
          () => {
            this.onSaveComplete();
          },
          (error: any) => (this.errorMessage = <any>error)
        );
      } else {
        this.onSaveComplete();
      }
    } else {
      this.errorMessage = 'Please correct the validation errors.';
    }
  }

  onSaveComplete(): void {
    // Reset the form to clear the flags
    this.huertoForm.reset();
    this.router.navigate(['']);
  }
}
