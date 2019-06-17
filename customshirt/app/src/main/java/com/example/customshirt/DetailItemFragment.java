package com.example.customshirt;


import android.content.Intent;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.Spinner;
import android.widget.TextView;


/**
 * A simple {@link Fragment} subclass.
 */
public class DetailItemFragment extends Fragment {

private Spinner spinnerJumlah;
    TextView tvNama, tvHarga, tvDeskripsi;

    public DetailItemFragment() {
        // Required empty public constructor
    }


    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        View myFragmentView = inflater.inflate(R.layout.fragment_detail_item, container, false);

        spinnerJumlah = (Spinner) myFragmentView.findViewById(R.id.spinnerJumlah);
        tvNama = myFragmentView.findViewById(R.id.tvNama);
        tvHarga = myFragmentView.findViewById(R.id.tvHarga);
        tvDeskripsi = myFragmentView.findViewById(R.id.tvDeskripsi);
//        Intent mIntent = getIntent();

//        tvNama.setText(mIntent.getStringExtra("Nama"));
//        tvHarga.setText(mIntent.getStringExtra("Harga"));
//        tvDeskripsi.setText(mIntent.getStringExtra("Deskripsi"));

//        Spinner spinnerjumlah = (Spinner)findViewById(R.id.spinnerJumlah);
//        ArrayAdapter<String> spinnerCountShoesArrayAdapter = new ArrayAdapter<String>(this, android.R.layout.simple_spinner_dropdown_item, getResources().getStringArray(R.array.jumlah));
//        spinnerjumlah.setAdapter(spinnerCountShoesArrayAdapter);

        return myFragmentView;
    }

}
