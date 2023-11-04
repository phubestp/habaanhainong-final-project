package ku.cs.habaanhainong.service;

import ku.cs.habaanhainong.entity.Users;
import ku.cs.habaanhainong.repository.MemberRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.security.core.authority.SimpleGrantedAuthority;
import org.springframework.security.core.userdetails.UserDetails;
import org.springframework.security.core.userdetails.UserDetailsService;
import org.springframework.security.core.userdetails.UsernameNotFoundException;
import org.springframework.stereotype.Service;


import java.util.ArrayList;
import java.util.List;


@Service
public class UserDetailsServiceImp implements UserDetailsService {


    @Autowired
    private MemberRepository userRepository;


    @Override
    public UserDetails loadUserByUsername(String username)
            throws UsernameNotFoundException {

        Users users = userRepository.findByUsername(username);

        if (users == null) {
            throw new UsernameNotFoundException("Could not find user");
        }

        List<SimpleGrantedAuthority> authorities = new ArrayList<>();
        authorities.add(new SimpleGrantedAuthority(users.getIsAdmin() ? "admin" : "user"));
        return new org.springframework.security.core.userdetails.User(
                users.getUsername(), users.getPassword(), authorities);
    }
}

