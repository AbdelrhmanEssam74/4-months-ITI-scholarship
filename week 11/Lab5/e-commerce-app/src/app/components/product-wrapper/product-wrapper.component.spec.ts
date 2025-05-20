import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ProductWrapperComponent } from './product-wrapper.component';

describe('ProductWrapperComponent', () => {
  let component: ProductWrapperComponent;
  let fixture: ComponentFixture<ProductWrapperComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [ProductWrapperComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(ProductWrapperComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
