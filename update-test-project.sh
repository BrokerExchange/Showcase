# if [ ! -d "./test-project/vendor/brokerexchange/showcase" ]; then
#     if [ ! -d "./test-project/vendor/brokerexchange" ]; then
#         mkdir ./test-project/vendor/brokerexchange
#     fi
#     cd test-project/vendor/brokerexchange
#     mkdir showcase showcase/src
#     cd ../../..
# fi
# cp -R ./src ./test-project/vendor/brokerexchange/showcase/src
# cp -R ./composer.json ./test-project/vendor/brokerexchange/showcase/composer.json
# cp -R ./composer.lock ./test-project/vendor/brokerexchange/showcase/composer.lock
# cp -R ./.gitignore ./test-project/vendor/brokerexchange/showcase/.gitignore
cd test-project
composer update brokerexchange/showcase
php artisan vendor:publish --provider=Showcase/App/Providers/ShowcaseProvider
php artisan migrate:fresh
php artisan db:seed --class=ShowcaseDatabaseSeeder
composer dump-autoload
echo "Test project updated!"