package com.example.customshirt;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.TextView;

public class DetailItem extends AppCompatActivity {

    TextView tvNama, tvHarga, tvDeskripsi;

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
    }
}
