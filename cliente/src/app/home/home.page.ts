import { Component, OnInit } from '@angular/core';
import { ViewDidEnter, ViewWillEnter } from '@ionic/angular';
import { HuertoService } from '../core/huerto.service';
import { Huerto } from '../shared/huerto';

@Component({
  selector: 'app-home',
  templateUrl: 'home.page.html',
  styleUrls: ['home.page.scss'],
})
export class HomePage implements OnInit, ViewDidEnter {
  huertos: any;
  constructor(private huertoService: HuertoService) {}
  ionViewDidEnter(): void {
    this.huertoService.getHuertos().subscribe((data: Huerto[]) => {
      this.huertos = data[0];
    });
  }

  ngOnInit() {
    this.huertoService.getHuertos().subscribe((data: Huerto[]) => {
      this.huertos = data[0];
    });
  }
}
