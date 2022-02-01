import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { HuertoService } from './huerto.service';
import { HttpClientModule } from '@angular/common/http';

// Import for loading & configuring in-memory web api
import { HuertoData } from './huerto-data';

@NgModule({
  declarations: [],
  imports: [CommonModule, HttpClientModule],
  providers: [HuertoService],
})
export class CoreModule {}
