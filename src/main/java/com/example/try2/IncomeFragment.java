package com.example.try2;

import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageButton;
import androidx.fragment.app.Fragment;
import androidx.fragment.app.FragmentManager;
import androidx.fragment.app.FragmentTransaction;

public class IncomeFragment extends Fragment {

    public IncomeFragment() {
        // Required empty public constructor
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        View view = inflater.inflate(R.layout.fragment_income, container, false);

        // Back button to go back to the previous fragment (DashboardFragment)
        ImageButton backButton = view.findViewById(R.id.button_back);
        backButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Popping the fragment from the back stack
                FragmentManager fragmentManager = getFragmentManager();
                if (fragmentManager != null) {
                    fragmentManager.popBackStack();
                }
            }
        });

        // Edit button logic to open EditIncomeFragment
        ImageButton editButton = view.findViewById(R.id.button_edit);
        editButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Replace current fragment with EditIncomeFragment
                FragmentTransaction transaction = getFragmentManager().beginTransaction();
                transaction.replace(R.id.fragment_container, new EditIncomeFragment()); // Ensure you have the correct container ID (e.g., fragment_container)
                transaction.addToBackStack(null);  // Optional, to allow back navigation
                transaction.commit();
            }
        });

        return view;
    }
}
