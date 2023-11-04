package ku.cs.habaanhainong.repository;

import ku.cs.habaanhainong.entity.Users;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import java.util.UUID;

@Repository
public interface MemberRepository extends JpaRepository<Users, UUID> {
    Users findByUsername(String username);
}

