OK..
I've sent Susan a video demo.
I ran out of time, but it all works. :)

**Working**:
Users can add coffee products into the DB. Each coffee product has a suplier (currently jsut seeded via seeder.. no admin on that )
Set the price (in pennies), the currenciy, profit required, shipping cost.

then the customer service person can record sales and if needed, change the cost (if directed by head office or whatever) per order.

Livewire was used for the quick loading.


**Issues**:
 - I didn't fully get to grips with MONEY library.. it seemed to work on the FE, but not on the BE.. very odd. so there's a mix and match of calcuations from pennies to £.. and I'm nt happy with that.. 
 - I think there's a small bug with auto updating prices on the customer page. editing price, THEN quantity is required to update sale price.. Ideally that would be more robust. but I ran out of time.
 - it's not pretty.. much more styling and perhaps a modal for coffee admin woul dhave been prettier. tables are ugly too.. sorry.


**TODOs**:
DOCS!!!!
Tests
Prettification
Better error handling

