package com.example.customshirt;

import android.app.FragmentTransaction;
import android.content.Intent;
import android.support.v4.app.FragmentManager;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

public class DetailItem extends AppCompatActivity implements View.OnClickListener {

    TextView tvNama, tvHarga, tvDeskripsi;

    private KeranjangFragment keranjangFragment;
    private Button btn_masukcart;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_detail_item);

        tvNama = findViewById(R.id.tvNama);
        tvHarga = findViewById(R.id.tvHarga);
        tvDeskripsi = findViewById(R.id.tvDeskripsi);

        Intent mIntent = getIntent();


        tvNama.setText(mIntent.getStringExtra("Nama"));
        tvHarga.setText(mIntent.getStringExtra("Harga"));
        tvDeskripsi.setText(mIntent.getStringExtra("Deskripsi"));

        btn_masukcart = (Button) findViewById(R.id.btn_masukcart);
        btn_masukcart.setOnClickListener(this);




    }

    @Override
    public void onClick(View v) {



    }


}
