import { Component } from '@angular/core';
import {ButtonComponent} from '../button/button.component';

@Component({
  selector: 'app-hero-section',
  templateUrl: './hero-section.component.html',
  imports: [
    ButtonComponent
  ],
  styleUrls: ['./hero-section.component.css']
})
export class HeroSectionComponent {}
