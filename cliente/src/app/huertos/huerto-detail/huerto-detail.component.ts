import { Component, OnInit } from '@angular/core';
import { HuertoService } from '../../core/huerto.service';
import { Huerto } from '../../shared/huerto';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-huerto-detail',
  templateUrl: './huerto-detail.component.html',
  styleUrls: ['./huerto-detail.component.css'],
})
export class HuertoDetailComponent implements OnInit {
  public huerto: Huerto = {
    id: 0,
    name: '',
    image: '',
    productos: [''],
    size: 0,
    disponibilidad: '',
    idUsuario: '',
  };
  huertoId: number = 0;
  public isloading: Boolean = true;

  constructor(
    private activatedroute: ActivatedRoute,
    private router: Router,
    private huertoService: HuertoService
  ) {}

  ngOnInit() {
    this.huertoId = parseInt(this.activatedroute.snapshot.params['huertoid']);
    this.huertoService
      .getHuertoById(this.huertoId)
      .subscribe((data: Huerto) => {
        this.isloading = true;
        this.huerto = data[0];
        this.isloading = false;
      });
  }
  goEdit(): void {
    this.router.navigate(['huertos/', this.huertoId, 'edit']);
  }
  onBack(): void {
    this.router.navigate(['../../app.component.html']);
  }
}
