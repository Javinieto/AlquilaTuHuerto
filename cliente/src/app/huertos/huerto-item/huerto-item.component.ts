import { Component, Input } from '@angular/core';
import { Huerto } from '../../shared/huerto';

@Component({
  selector: 'app-huerto-item',
  templateUrl: './huerto-item.component.html',
  styleUrls: ['./huerto-item.component.css'],
})
export class HuertoItemComponent {
  @Input() huerto: Huerto = {
    id: 0,
    name: '',
    image: '',
    productos: [],
    size: 0,
    disponibilidad: '',
    idUsuario: '',
  };
}
