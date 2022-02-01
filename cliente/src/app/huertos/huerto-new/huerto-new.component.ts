import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { Huerto } from '../../shared/huerto';
import { ActivatedRoute, Router } from '@angular/router';
import { HuertoService } from '../../core/huerto.service';

@Component({
  selector: 'app-huerto-new',
  templateUrl: './huerto-new.component.html',
  styleUrls: ['./huerto-new.component.css'],
})
export class HuertoNewComponent implements OnInit {
  pageTitle = 'Huerto New';
  errorMessage: string = '';
  huertoForm: any;

  huertoId: number = 0;
  huerto: Huerto = {
    id: 0,
    name: '',
    image: '',
    productos: [''],
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
      name: [''],
      productos: '',
      size: '',
      disponibilidad: '',
      idUsuario: '',
      image: '',
    });

    // Read the product Id from the route parameter
    this.huertoId = parseInt(this.activatedroute.snapshot.params['huertoid']);
  }

  saveHuerto(): void {
    if (this.huertoForm.valid) {
      if (this.huertoForm.dirty) {
        this.huerto = this.huertoForm.value;
        this.huerto.id = this.huertoId + 1;

        this.huertoService.createHuerto(this.huerto).subscribe(
          () => this.onSaveComplete(),
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
