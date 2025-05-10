import { Component } from '@angular/core';
import { RouterOutlet } from '@angular/router';
import {HeroSectionComponent} from './hero-section/hero-section.component';
import {AboutMeComponent} from './about-me/about-me.component';
import {SkillsComponent} from './skills/skills.component';
import {PortfolioComponent} from './portfolio/portfolio.component'
import {FooterComponent} from './footer/footer.component';

@Component({
  selector: 'app-root',
  imports: [RouterOutlet, HeroSectionComponent, AboutMeComponent, SkillsComponent , PortfolioComponent , FooterComponent],
  templateUrl: './app.component.html',
  styleUrl: './app.component.css'
})
export class AppComponent {
  title = 'angular-portfolio';
}
