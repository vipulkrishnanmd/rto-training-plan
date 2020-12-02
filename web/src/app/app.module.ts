import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { FrontPageModule} from './front-page/front-page.module';
import { TimeTableModule } from './time-table/time-table.module';
import { HttpClientModule } from '@angular/common/http';
import { AppService } from './app.service';

@NgModule({
  declarations: [
    AppComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    FrontPageModule,
    TimeTableModule,
    HttpClientModule
  ],
  providers: [HttpClientModule, AppService],
  bootstrap: [AppComponent],
})
export class AppModule { }
