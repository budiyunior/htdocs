package com.example.customshirt;


import android.os.Bundle;
import android.support.annotation.NonNull;
import android.support.design.widget.BottomNavigationView;
import android.support.v4.app.Fragment;
import android.support.v4.app.FragmentTransaction;
import android.support.v7.app.AppCompatActivity;
import android.view.LayoutInflater;
import android.view.MenuItem;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.FrameLayout;


/**
 * A simple {@link Fragment} subclass.
 */
public class AkunFragment extends Fragment {

    private BottomNavigationView mMainNav;
    private FrameLayout mMainFrame;

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

        bantuanFragment = new BantuanFragment();

        Button btn_bantuan=(Button) myFragmentView.findViewById(R.id.btn_bantuan);

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

}
