package com.example.customshirt;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.app.ProgressDialog;
import android.content.Context;
import android.support.v7.app.AlertDialog;
import android.support.v7.widget.RecyclerView;
import android.text.Editable;
import android.text.InputFilter;
import android.text.TextWatcher;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.widget.AdapterView;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ListView;
import android.widget.Toast;

import com.example.customshirt.Adapter.CityAdapter;
import com.example.customshirt.Adapter.ProvinceAdapter;
import com.example.customshirt.Rest.ApiInterface;
import com.example.customshirt.Rest.ApiClient;
import com.example.customshirt.Model.city.ItemCity;
import com.example.customshirt.Model.province.ItemProvince;
import com.example.customshirt.Model.province.Result;
import com.google.gson.Gson;

import java.util.ArrayList;
import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;
import retrofit2.Retrofit;
import retrofit2.converter.gson.GsonConverterFactory;

public class AlamatActivity extends AppCompatActivity {

    private Button btn_newalamat;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_alamat);

        btn_newalamat = (Button) findViewById(R.id.btn_newalamat);

        btn_newalamat.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent EditAlamatActivity = new Intent(AlamatActivity.this, EditAlamatActivity.class);
                startActivity(EditAlamatActivity);
            }
        });

    }
}
