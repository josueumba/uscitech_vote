SELECT COUNT(*) FROM vote v JOIN candidat c ON c.id= v.candidat JOIN poste p ON p.id= c.poste JOIN etudiant e ON e.id= c.etudiant WHERE p.titre= 'president' AND e.nom= 'kilima';

SELECT COUNT(*) FROM vote v JOIN candidat c ON c.id= v.candidat JOIN poste p ON p.id= c.poste JOIN etudiant e ON e.id= c.etudiant WHERE p.titre= 'vice president' AND e.nom= 'kiangebeni';

SELECT COUNT(*) FROM vote v JOIN candidat c ON c.id= v.candidat JOIN poste p ON p.id= c.poste JOIN etudiant e ON e.id= c.etudiant WHERE p.titre= 'cp' AND e.nom= 'mbembe' AND e.promotion= 'bac3';

SELECT COUNT(*) FROM vote v JOIN candidat c ON c.id= v.candidat JOIN poste p ON p.id= c.poste JOIN etudiant e ON e.id= c.etudiant WHERE p.titre= 'cpa' AND e.nom= 'umba' AND e.promotion= 'bac3';