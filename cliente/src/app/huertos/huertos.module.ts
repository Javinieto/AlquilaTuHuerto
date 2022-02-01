import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { HuertosRoutingModule } from './huertos-routing.module';
import { HuertoItemComponent } from './huerto-item/huerto-item.component';
import { SharedModule } from '../shared/shared.module';
import { HuertoNewComponent } from './huerto-new/huerto-new.component';
import { HuertoEditComponent } from './huerto-edit/huerto-edit.component';
import { HuertoDetailComponent } from './huerto-detail/huerto-detail.component';

@NgModule({
  declarations: [
    HuertoNewComponent,
    HuertoItemComponent,
    HuertoEditComponent,
    HuertoDetailComponent,
  ],
  imports: [CommonModule, HuertosRoutingModule, SharedModule],
  exports: [HuertoItemComponent],
})
export class HuertosModule {}
