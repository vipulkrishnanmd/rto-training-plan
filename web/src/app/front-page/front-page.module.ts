import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import {FormsModule, ReactiveFormsModule} from '@angular/forms';
import {FrontPageComponent} from './front-page.component';

@NgModule({
    imports: [
      FormsModule,
      ReactiveFormsModule,
      CommonModule
    ],
    declarations: [
      FrontPageComponent,
    ],
    entryComponents: [
      FrontPageComponent,
    ],
    exports: [ FrontPageComponent ],
  })

  export class FrontPageModule{

  }
