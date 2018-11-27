node {
   def mvnHome
   stage('Preparation') { // for display purposes

      git 'https://github.com/Selandron/insa'

   }
   stage('Build') {
       dir('poneys') {
            // Run the maven build
            if (isUnix()) {
                sh "composer install"
                sh "./vendor/bin/phpunit -c phpunit.xml"
            } else {
                bat(/composer install/)
                bat(/.\vendor\bin\phpunit -c phpunit.xml/)
            }
        }

   }
   stage('Results') {
        junit 'poneys/logfile.junit.xml'
   }
}