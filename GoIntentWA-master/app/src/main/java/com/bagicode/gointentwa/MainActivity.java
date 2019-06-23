package com.bagicode.gointentwa;

import android.content.Intent;
import android.net.Uri;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;

/*
Create by bagicode

Read More : https://faq.whatsapp.com/id/android/26000030/
*/

public class MainActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        findViewById(R.id.btnGOWA).setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                String pakePesan = "https://api.whatsapp.com/send?phone=15551234567&text=Saya%20tertarik%20untuk%20membeli%20mobil%20Anda";
                String pakePesanAja = "https://api.whatsapp.com/send?text=Saya%20memiliki%20pertanyaan%20mengenai%20apartment%20yang%20disewakan";
                String pakeNoAja = "https://wa.me/628561333111";

                Intent i = new Intent(Intent.ACTION_VIEW,
                        Uri.parse(pakeNoAja));
                startActivity(i);
            }
        });
    }
}
