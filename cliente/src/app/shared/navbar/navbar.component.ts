import { Component, OnInit } from '@angular/core';
import { HuertoService } from '../../core/huerto.service';
import { Router } from '@angular/router';
import { AuthService } from '../auth.service';

@Component({
  selector: 'app-navbar',
  templateUrl: './navbar.component.html',
  styleUrls: ['./navbar.component.css'],
})
export class NavbarComponent implements OnInit {
  id: any;

  constructor(private huertoService: HuertoService, private router: Router) {}

  ngOnInit() {}

  newHuerto() {
    // Get max huerto Id from the huerto list
    this.huertoService.getMaxHuertoId().subscribe((data) => (this.id = data));
    this.router.navigate(['/huertos/new']);
  }
  login() {
    this.router.navigate(['/login']);
  }

  register() {
    this.router.navigate(['/register']);
  }
}
