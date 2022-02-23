import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { HuertoDetailComponent } from './huerto-detail/huerto-detail.component';
import { HuertoEditComponent } from './huerto-edit/huerto-edit.component';
import { HuertoNewComponent } from './huerto-new/huerto-new.component';

const routes: Routes = [
  { path: 'huertos/new', component: HuertoNewComponent },
  { path: 'huertos/:huertoid', component: HuertoDetailComponent },
  { path: 'huertos/:id/edit', component: HuertoEditComponent },
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class HuertosRoutingModule {}
