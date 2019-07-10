package com.example.customshirt;


import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;
import android.net.Uri;
import android.os.Bundle;
import android.support.design.widget.BottomNavigationView;
import android.support.v4.app.Fragment;
import android.support.v4.app.FragmentTransaction;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.FrameLayout;
import android.widget.ImageView;
import android.widget.TextView;

import com.squareup.picasso.Picasso;


/**
 * A simple {@link Fragment} subclass.
 */
public class AkunFragment extends Fragment implements View.OnClickListener {

    private BottomNavigationView mMainNav;
    private FrameLayout mMainFrame;
    private Button btn_profil, btn_logout;
    private Button btn_cs;
    private Button btn_cost;
    private Button btn_alamatsaya;
    Context mcontext;
    SharedPreferences sharedPreferences;
    private TextView user_profile_name;
    Spref spref;
    private BantuanFragment bantuanFragment;

    public AkunFragment() {
        // Required empty public constructor
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        getActivity().setTitle("Akun");
        View myFragmentView =  inflater.inflate(R.layout.fragment_akun, container, false);
        spref = new Spref(this.getActivity());
        bantuanFragment = new BantuanFragment();
        btn_profil = (Button) myFragmentView.findViewById(R.id.btn_profil);
        btn_profil.setOnClickListener(this);
        Button btn_bantuan=(Button) myFragmentView.findViewById(R.id.btn_bantuan);
        //this.mcontext = context;
        String imageUri = "http://192.168.0.112/adigagas/upload/profil/ctm5d0c97582efbd.jpg";
        ImageView img_profile = (ImageView) myFragmentView.findViewById(R.id.user_profile_photo);
        Picasso.with(this.mcontext).load(imageUri).into(img_profile);

        btn_cs = (Button) myFragmentView.findViewById(R.id.btn_cs);
        btn_cs.setOnClickListener(this);

        btn_cost = (Button) myFragmentView.findViewById(R.id.btn_cost);
        btn_cost.setOnClickListener(this);
        btn_logout = (Button) myFragmentView.findViewById(R.id.btn_logout);
        btn_logout.setOnClickListener(this);

        btn_alamatsaya = (Button) myFragmentView.findViewById(R.id.btn_alamatsaya);
        btn_alamatsaya.setOnClickListener(this);


        sharedPreferences = this.getActivity().getSharedPreferences("remember", Context.MODE_PRIVATE);

        String email=sharedPreferences.getString("email","1");
        Log.e("Berhasil", "berhasil"+email);
        user_profile_name= myFragmentView.findViewById(R.id.user_profile_name);
        user_profile_name.setText(email);

        btn_bantuan.setOnClickListener(new View.OnClickListener() {
            @Override
                    public void onClick(View v) {
                FragmentTransaction ft = getFragmentManager().beginTransaction();
                ft.replace(R.id.main_frame, new BantuanFragment());
                ft.commit();
            }
        });


        return myFragmentView;

    }

    public void onClick(View v) {

        if (v == btn_profil) {
            Intent ProfileActivity = new Intent(getActivity(), ProfileActivity.class);
            startActivity(ProfileActivity);
        }

        if (v == btn_cost) {
            Intent PengirimanActivity = new Intent(getActivity(), PengirimanActivity.class);
            startActivity(PengirimanActivity);
        }

        if (v == btn_alamatsaya) {
            Intent AlamatActivity = new Intent(getActivity(), AlamatActivity.class);
            startActivity(AlamatActivity);
        }

        if (v == btn_cs){
            String pesan = "Hi Admin, Saya butuh bantuan!";
            String nomor = "6285230737515";
            String kirimWA = "https://wa.me/"+nomor+"?text="+pesan;

            Intent i = new Intent(Intent.ACTION_VIEW,
                    Uri.parse(kirimWA));
            startActivity(i);
        }
        if (v == btn_logout) {
//            sharedPreferences.saveSPBoolean(SharedPreferences.SP_SUDAH_LOGIN, false);
            spref.saveSPBoolean(spref.SP_Sukses_Login, false);
            startActivity(new Intent(getActivity(), LoginActivity.class)
                    .addFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP | Intent.FLAG_ACTIVITY_NEW_TASK));
//            finish();
        }
    }
}
